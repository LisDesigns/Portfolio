<%

Dim Item1Name, Item2Name, Item3Name
Dim contact1Name, contact2Name, contact3Name, contact4Name, contact5Name, contact6Name
Dim contact7Name, contact8Name
Dim strOption, strQuantity, strSubtotal, strTotal
Dim Price1, Price2, Price3
Dim Quant1, Quant2, Quant3
Dim Opt1, Opt2, Opt3
Dim intQuant1, intQuant2, intQuant3
Dim Subtotal1, Subtotal2, Subtotal3
Dim TotalBeforeShipping, Shipping, TotalAfterShipping
Dim cont1, cont2, cont3
Dim strOrder, strStrength
Dim LargeFrame
Dim Opt4

strStrength = " <b>Strength:</b> "

Item1Name = "Computer Glasses "
Item2Name = "Low Power Reading Glasses "
Item3Name = "Rimless Frames "

contact1Name = "<b>First Name: </b>"
contact2Name = "<b>Last Name: </b>"
contact3Name = "<b>Postal Address: </b>"
contact4Name = "<b>City: </b>"
contact5Name = "<b>State: </b>"
contact6Name = "<b>Zip Code: </b>"
contact7Name = "<b>Country: </b>"
contact8Name = "<b>Phone: </b>"
contact9Name = "<b>Email Address: </b>"

strItem ="<b>Item:</b> "
strOption = "<b>Option:</b>"
strQuantity = "<b>Quantity:</b> "
strSubtotal = "<b>Subtotal:</b> "
strTotal = "<b>Total:</b> "

Price1 = 24.95
Price2 = 24.95
Price3 = 10.00

Quant1= request.form("Quantity1")
Quant2= request.form("Quantity2")
Quant3= request.form("Quantity3")
largeSelection = request.form("largeSelection")

Opt1= " +.25D Normal Vision"
Opt2= "Lens choice: " + request.form("Option2")
Opt3= " (noRx)"
LargeFrame = request.form("largeframe")

If Len(Opt2) = 0 Then
   Opt2= "Not Specified"
End If

If LargeFrame = "Yes" Then
   Opt4 = "***Larger frame option chosen" 
End If

If Len(largeSelection) > 0 Then 
   Opt4 = Opt4 & "<br/><b>Selection Notes:</b><br/>" & largeSelection 
End If 

intQuant1 = CInt(Quant1)
intQuant2 = CInt(Quant2)
intQuant3 = CInt(Quant3)

Subtotal1 = intQuant1 * Price1
Subtotal2 = intQuant2 * Price2
Subtotal3 = intQuant3 * Price3

TotalBeforeShipping = Subtotal1 + Subtotal2 + Subtotal3 + Subtotal4 + Subtotal5 + Subtotal6
TotalBeforeShipping = TotalBeforeShipping + Subtotal7 + Subtotal8
Shipping = "5.00"
TotalAfterShipping = TotalBeforeShipping + 5.00

cont1 = request.form("Contact1")
cont2 = request.form("Contact2")
cont3 = request.form("Contact3")
cont4 = request.form("Contact4")
cont5 = request.form("Contact5")
cont6 = request.form("Contact6")
cont7 = request.form("Contact7")
cont8 = request.form("Contact8")
cont9 = request.form("Contact9")



strOrder = "<font face=arial size=2><b>EyeFatigue Order</b><br><br><br>"

If intQuant3 > 0 Then
  strOrder = strOrder & strItem & Item3Name & strOption & Opt3 & " " & strQuantity & Quant3
  strOrder = strOrder & "<br><br>"
End If

If intQuant1 > 0 Then
   strOrder = strOrder & strItem & Item1Name & strOption & Opt1 & " " & strQuantity & Quant1 & "<br><br>"
End If
If intQuant2 > 0 Then
  strOrder = strOrder & strItem & Item2Name & strOption & " " & Opt2 & " " & strQuantity & Quant2 & "<br><br>"

  Quant2 = Quant2 - 1

  For i=1 To Quant2 
    optName = "Option2_" & i
    optName1 = request.form(optName)
    strOrder = strOrder & "Low Power Reading Glasses (Addional Pair) - Option: " & optName1 & "<br><br>"
  Next

End If

If intQuant6 > 0 Then
  strOrder = strOrder & strItem & Item6Name & strOption & Opt6 & " " & strQuantity & Quant6
  strOrder = strOrder & " <br>"
  strOrder = strOrder & strOption & Item7Name & strStrength & Opt7 & " <br>"
  strOrder = strOrder & strOption & Item8Name &  strStrength & Opt8 & " <br><br>"
End If

If Len(Opt4) > 0 Then 
  strOrder = strOrder & Opt4 & "<br><br/>" 
End If
strOrder = strOrder & "<br><b>Subtotal:</b> " & Round(TotalBeforeShipping, 2)
strOrder = strOrder & "<br><b>Shipping:</b> " & Shipping
strOrder = strOrder & "<br><b>Total:</b> " & Round(TotalAfterShipping,2)

strOrder = strOrder & "<br><br> <b>Shipping Details </b>"

strOrder = strOrder & "<br><br>" & contact1Name & cont1 & "<br>" & contact2Name
strOrder = strOrder & cont2 & "<br>" & contact3Name & cont3

strOrder = strOrder & "<br>" & contact4Name & cont4 & "<br>" & contact5Name & cont5
strOrder = strOrder & "<br>" &  contact6Name & cont6

strOrder = strOrder & "<br>" & contact7Name & cont7 & "<br>" & contact8Name & cont8 & "<br>"
strOrder = strOrder & contact9Name & cont9 & "</font>"




Set objCDOSYSMail = Server.CreateObject("CDO.Message")

'Who the e-mail is from
objCDOSYSMail.From = "noreply@eyefatigue.com"
'Who the e-mail is sent to
objCDOSYSMail.To = "info@eyefatigue.com" 
'objCDOSYSMail.To = "lisa@lisdesigns.com.au" 
'The subject of the e-mail
objCDOSYSMail.Subject = "* Eyeglasses Order *" 
'Set the e-mail body format (HTMLBody=HTML TextBody=Plain)
objCDOSYSMail.HTMLBody = strOrder
objCDOSYSMail.Send 
Set objCDOSYSMail = Nothing

tr = Round(TotalBeforeShipping,2)
netr = Replace(tr,".","%2e")


'Response.write(netr)

redValue = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=Ltd%40ceramicknife"
redValue = redValue & "%2eorg&item_name=EyeFatigue Order&i&amount=" & netr
redValue = redValue & "&shipping=4.5&no_note=1&currency_code=USD&bn=PP%"
redValue = redValue & "2dBuyNowBF&charset=UTF%2d8"


'Put back in place testing - paypal
Response.redirect(redValue)

%>
