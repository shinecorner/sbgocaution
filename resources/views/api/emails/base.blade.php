<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            html, body {
            margin: 0 !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            color: #7A7A7A;
            font-family: Helvetica, Arial, \'Lucida Grande\', sans-serif;
            font-weight: normal;
            }
            body table.table1 td{
            padding:0px;
            }
            /* What it does: Stops email clients resizing small text. */
            * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            }

            .a3s h3{padding:0 !important;}

            @media(max-width:599px){
                .tableshrink{width:320px !important;}
                .tableshrink h3{font-size:14px;}
                .tableshrink .block-header{text-align: center;}
            }
            
            /* Media Queries */
            @media screen and (max-width: 600px) {
                .tableshrink {
                width: 100% !important;
                }
                /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
                .fluid,
                .fluid-centered {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
                }
                /* And center justify these ones. */
                .fluid-centered {
                margin-left: auto !important;
                margin-right: auto !important;
                }
                /* What it does: Forces table cells into full-width rows. */
                .stack-column,
                .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
                }
                /* And center justify these ones. */
                .stack-column-center {
                text-align: center !important;
                }
                /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
                }
                .left-on-narrow {
                text-align: left !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
                font-family: sans-serif;
                font-size: 15px;
                mso-height-rule: exactly;
                line-height: 20px;
                color: #ffffff;
                padding: 0 10px 10px;
                }
                table.center-on-narrow, table.left-on-narrow {
                display: inline-block !important;
                }
            } .login-btn:hover{
                    background-color: #056938;
                }
        </style>
    </head>
    <body  bgcolor="#e0e0e0" width="100%" style="margin:0; font-family:Helvetica, Arial, \'Lucida Grande\', sans-serif; color:#7A7A7A;background-color:#e0e0e0;" >{preheader_text}
        <table bgcolor="#e0e0e0" cellpadding="0" cellspacing="0" border="0" width="100%"
            style="margin:0 auto; font-family:Helvetica, Arial, \'Lucida Grande\', sans-serif; color:#7A7A7A; text-align:-moz-center;background-color:#e0e0e0;" >
            <tr>
                <td>
                    <center style="width:100%;">
                        <!-- Email Header -->
                        <table align="center" width="600" class="tableshrink" bgcolor="#8DBF43" style="background-color:#8DBF43;">
                            <tr height="20">
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td style="line-height: 0px;" width="340"  class="block-header">
                                     {logo}
                                </td>
                                <td width="200">{policy_damage_partner_login_button}</td>
                                <td width="30"></td>

                            </tr>
                            <tr height="20">
                                <td colspan="4"></td>
                            </tr>
                        </table>
                        <!-- Email Header -->
                        <!-- Email Body -->
                        <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff"  style="background-color:#ffffff;" width="600" class="tableshrink">
                            <tr height="40">
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td class="email-body">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        
                                        <tr>
                                            <td style="color:#7a7a7a;">
                                                {customer_email_message}
                                            </td>
                                        </tr>
                                        <tr height="20">
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="30"></td>
                            </tr>
                            <tr>
                                <td colspan="3" bgcolor="#8DBF43"  style="background-color:#8DBF43;">
                                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="tableshrink">
                                        <tr>
                                            <td width="30"></td>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="color:#fff;">
                                                    <tr height="20">
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="stack-column-center" style="width:270px; float:left; font-size:14px; line-height:20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%"  style="font-size:14px; line-height:20px;">
                                                                <tr>
                                                                    <td style="color:#ffffff;">{company_name}<br><a style="color:#ffffff; text-decoration:none;">{company_address}<br>{company_zip_city}</a>
                                                                    </td>
                                                                </tr>
                                                                <tr height="20">
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td valign="top" class="stack-column-center" style="width:270px; float:left; font-size:14px; line-height:20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size:14px; line-height:20px;">
                                                                <tr>
                                                                    <td style="color:#ffffff;">{company_hotline}<br>{office_working_time}<br>{company_email}
                                                                    </td>
                                                                </tr>
                                                                <tr height="20">
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- Email Body -->
                        <!-- Email Footer -->
                        <table align="center" width="600" class="tableshrink" bgcolor="#056938"  style="background-color:#056938;">
                            <tr height="30">
                                <td></td>
                            </tr>
                            <tr>
                                <td class="block-footer"  width="600" align="center">
                                    <p class="social-btns">
                                        <a href="http://facebook.com/gocaution" target="_blank" style="color:#7a7a7a; text-decoration:none;">
                                        <img alt="" height="27" src="http://my.gocaution.ch/media/com_acymailing/upload/facebook.png" width="27" border="0"></a>&nbsp;
                                        <a href="https://twitter.com/gocaution" style="color:#7a7a7a; text-decoration:none;"><img alt="" height="27" src="http://my.gocaution.ch/media/com_acymailing/upload/twitter.png" width="27" border="0"></a>&nbsp;
                                        <a href="https://plus.google.com/103559495369096461881" style="color:#7a7a7a; text-decoration:none;"><img alt="" height="27" src="http://my.gocaution.ch/media/com_acymailing/upload/google.png" width="27" border="0"></a>
                                    </p>
                                    <span style="color:#fff; font-size:12px;">{copyright}</span>
                                </td>
                            </tr>
                            <tr height="30">
                                <td></td>
                            </tr>
                        </table>
                        <!-- Email Footer -->
                    </center>
                </td>
            </tr>
        <table>
    </body>
</html>
