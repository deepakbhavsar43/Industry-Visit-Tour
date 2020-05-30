<?php

echo'	<div class="mo_registration_divided_layout mo-otp-full">
				<div class="mo_registration_table_layout mo-otp-center">
				    <table style="width:100%">
						<form name="f" method="post" action="" id="mo_add_on_settings">
							<input type="hidden" name="option" value="mo_add_on_settings" />
							<tr>
								<td>
									<h2>'.mo_("OTP VERIFICATION ADD-ONS").'</h2>
									<hr>
								</td>
							</tr>
							<tr>
								<td>'.mo_("Various OTP Verification add-ons."
                                            ."Click on the configure button below to see add-on settings").'
                                </td>
							</tr>
							<tr>
								<table class="addon-table-list" cellspacing="0">
									<thead>
										<tr>
											<th class="addon-table-list-status" style="width:20px;">Add On</th>
											<th class="addon-table-list-name">Description</th>
											<th class="addon-table-list-actions" style="width:10px;">Actions</th>						
										</tr>
									</thead>
									<tbody>';
                                        
                                        foreach ($addonList as $addon) {
echo                                        '<tr>
                                                <td class="addon-table-list-status">
                                                    '.$addon->getAddOnName().'
                                                </td>
                                                <td class="addon-table-list-name">
                                                    <i>
                                                        '.$addon->getAddOnDesc().'
                                                    </i>
                                                </td>
                                                <td class="addon-table-list-actions">
                                                    <a  class="button-primary button tips" 
                                                        href="'.$addon->getSettingsUrl().'">
                                                        '.mo_("Settings").'
                                                    </a>
                                                </td>
                                            </tr>';
                                        }
echo                                '</tbody>
								</table>
							</tr>
						</form>	
					</table>
				</div>
			</div>';