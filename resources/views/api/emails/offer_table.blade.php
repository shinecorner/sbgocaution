<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;font-size:11px;">
	<tbody>
		<tr>
			<th style="border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:left;border-left:1px solid #e5e5e5;">{{ __("general.offer_email.PRODUCT") }}</th>
			<th style="border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:center;">{{ __("general.offer_email.DEPOSIT") }}</th>
			<th style="border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:center">{{ __("general.offer_email.PREMIUM_PERCENT") }}</th>
			<th style="border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:right">{{ __("general.offer_email.TOTAL") }}</th>
		</tr>
		<tr>
			<td style="border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:left;;border-left:1px solid #e5e5e5;" nowrap="">{{ __("general.offer_email.PRODUCT_NAME") }}</td>
			<td style="border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:center;" nowrap="">{{ $deposit_amount_formatted }}</td>
			<td style="border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:center" nowrap="">4.5%</td>
			<td style="border-bottom:1px solid #e5e5e5;border-right:1px solid #e5e5e5;padding:5px;text-align:right" nowrap=""><div></div><span style="font-size:11px;font-weight:bold;text-align:right;text-transform:uppercase;white-space:nowrap">{{ $premium_formatted }}</span></td>
		</tr>
	</tbody>
</table>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border-bottom:1px solid #e5e5e5;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;width:100%;font-size:11px;"> 
	<tbody>
		<tr>
			<td style="width:200px"></td>
			<td style="padding-top:3px;padding-bottom:3px;padding-left:7px;font-weight:bold;"> {{ __("general.offer_email.TAX") }}</td>
			<td style="text-align:right;padding-top:3px;padding-bottom:3px;padding-right:7px;">{{ $premium_tax_formatted }}</td>
		</tr>
		<tr>
			<td style="width:200px"></td>
			<td style="line-height:16px;padding-top:3px;padding-bottom:3px;padding-left:7px;font-weight:bold;background-color: #8DBF43;color: #ffffff;">{{ __("general.offer_email.TOTAL") }}</td>
			<td style="text-align:right;line-height:16px;padding-top:3px;padding-bottom:3px;padding-right:7px;font-weight:bold;background-color: #8DBF43;color: #ffffff;">{{ $premium_total_formatted }}</td>
		</tr>
	</tbody>
</table>