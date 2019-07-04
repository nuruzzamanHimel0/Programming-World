<?php 
$query = "DELETE sms_campaign,sms_script,sms_keywords,sms_alive,sms_signature,sms_hangup,sms_incmig_pic
						FROM sms_campaign 
							INNER JOIN sms_script
							ON sms_campaign.id = sms_script.campaign_id AND sms_script.campaign_id = ?
							
							INNER JOIN sms_keywords
							ON sms_campaign.id = sms_keywords.campaign_id AND sms_keywords.campaign_id = ?

							INNER JOIN sms_alive
							ON sms_campaign.id = sms_alive.campaign_id AND sms_alive.campaign_id = ?

							INNER JOIN sms_signature
							ON sms_campaign.id = sms_signature.campaign_id AND sms_signature.campaign_id = ?

							INNER JOIN sms_hangup
							ON sms_campaign.id = sms_hangup.campaign_id AND sms_hangup.campaign_id = ?

							INNER JOIN sms_incmig_pic
							ON sms_campaign.id = sms_incmig_pic.campaign_id AND sms_incmig_pic.campaign_id = ?
			 ";

			 $dltstmt = $this->dbh->prepare($query);
			$dlt = $dltstmt->execute(array($camp_id,$camp_id,$camp_id,$camp_id,$camp_id,$camp_id));

			if($dlt)
			{
					echo "success";
			exit();
			}
			else{
				echo "not delete";
				exit();
			}


?>