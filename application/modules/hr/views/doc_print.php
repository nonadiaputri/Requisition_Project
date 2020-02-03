
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/style1.css');?>" media="all" />
  	<page size="A4">A4</page>
  </head>
  <body>
    <header class="clearfix">
      <img src="./assets/images/kgmedia.png" width="180" height="40" >
    	<img src="./assets/images/KompasGramedia.png" width="180" height="30" align="right">
      <h4 style="text-align:  center;">Hiring Approval Requisition</h4>
          
    </header>
    <main>
    	<h4 style="text-align:  center;outline-style: groove;">Applicant Requester Information</h4><br>
      <div id="tab-1"> 
    	<table>
    		<tr>
    			<td>Requestor Number</td>
    			<td>:</td>
    			<td></td>
    		</tr>
    		<tr>
    			<td>Requestor</td>
    			<td>:</td>
    			<td><?php echo $req['Requestor']; ?></td>
    		</tr>
    		<tr>
    			<td>Requestor Position</td>
    			<td>:</td>
    			<td><?php echo $req['requestor_pos']; ?></td>
    		</tr>
    		<tr>
    			<td>Department</td>
    			<td>:</td>
    			<td></td>
    		</tr>
    		<tr>
    			<td>Phone</td>
    			<td>:</td>
    			<td></td>
    		</tr>

    	</table>
    </div>
    <br>
    	
    	<h4 style="text-align:  center;outline-style: groove;">Applicant Request Detail Information</h4><br>
    	<table>
    		<tr>
    			<td>Position</td>
    			<td>:</td>
    			<td><?php echo $req['requested_pos']; ?></td>
    		</tr>
    		<tr>
    			<td>Requisition Type</td>
    			<td>:</td>
    			<td><?php if($req['RequisitionTypeID']== 1){
            echo "Additional";
          }else{
            echo "Replacement";
          };?></td>
    		</tr>
        <tr>
          <td>Employment Type</td>
          <td>:</td>
          <td><?php echo $req['EmployeeType']; ?></td>
        </tr>
    		<tr>
    			<td>Total Need</td>
    			<td>:</td>
    			<td><?php echo $req['NumberOfPlacement']; ?></td>
    		</tr>
    		<tr>
    			<td>Cost Center</td>
    			<td>:</td>
    			<td><?php echo $req['Placement']; ?></td>
    		</tr>
    		<tr>
    			<td>Expected Work Start Date</td>
    			<td>:</td>
    			<td><?php echo $req['ExpectedWorkStartDate']; ?></td>
    		</tr>
    		<tr>
    			<td>Description of Dutties and Responsibilities</td>
    			<td>:</td>
    			<td><?php echo  $req['DuttiesAndResponsibilities'];; ?></td>
    		</tr>
    		<tr>
    			<td>Description of Requirement</td>
    			<td>:</td>
    			<td><?php echo $req['RequirementDescription']; ?></td>
    		</tr>
        <?php
        if ($req['IsProcessedToHire'] == '1') {?>
        <tr>
          <td>Request Status </td>
          <td>:</td>
          <td><?php if($req['IsProcessedToHire']=='1'){
                    echo "Approved";
                 }else if ($req['IsHold']=='1') {
                    echo "Hold";
                 }else if ($req['IsRejected']=='1') {
                    echo "Rejected";
                }
                 ?></td>
        </tr>
        <tr>
          <td>Start From</td>
          <td>:</td>
          <td><?php echo date("Y-m-d H:i:s",strtotime($req['ProcessStartDate'])) ; ?></td>
        </tr>
        <?php }else if($req['IsHold'] == '1'){ ?>
         <tr>
          <td>Request Status </td>
          <td>:</td>
          <td><?php if($req['IsProcessedToHire']=='1'){
                    echo "Approved";
                 }else if ($req['IsHold']=='1') {
                    echo "Hold";
                 }else if ($req['IsRejected']=='1') {
                    echo "Rejected";
                }
                 ?></td>
        </tr>
        <tr>
          <td>Hold Date</td>
          <td>:</td>
          <td><?php echo date("Y-m-d H:i:s",strtotime($req['HoldEndDate'])) ; ?></td>
        </tr>
        <?php }else if($req['IsRejected'] == '1'){ ?>
        <tr>
          <td>Request Status </td>
          <td>:</td>
          <td><?php if($req['IsProcessedToHire']=='1'){
                    echo "Approved";
                 }else if ($req['IsHold']=='1') {
                    echo "Hold";
                 }else if ($req['IsRejected']=='1') {
                    echo "Rejected";
                }
                 ?></td>
        </tr>
        <tr>
          <td>Reason</td>
          <td>:</td>
          <td><?php echo $req['RejectReason'] ; ?></td>
        </tr>
          <?php }
         ?>

    	</table>
    	<br>
    	<br>
        <!-- <?php if($req['IsProcessedToHire']=='1'){?>
        <img src="./assets/images/approved.png" width="290" height="80" align="right">
        <?php } else if($req['IsHold']=='1'){ ?>
        <img src="./assets/images/HOLD.png" width="290" height="80" align="right">
        <?php } else if($req['IsRejected']=='1'){ ?>
        <img src="./assets/images/rejected.png" width="290" height="80" align="right">
        <?php } ?>
        <br>
        <br>
        <br>
        <br>
        <br> -->

        <fieldset class="checkbox">
          <label>
              <input type="checkbox" value="" checked="checked" class="checkbox-mngr">Requested by
              <?php echo $latest[0][ 'PersonnelName']; ?><br>
              <?php echo $latest[0][ 'Position']; ?>
          </label>
        </fieldset>
        <fieldset class="checkbox">
          <label>
              <input type="checkbox" value="" checked="checked" class="checkbox-mngr"><?php if ($latest[1]['IsProcessedToHire'] == 1) {
                echo "Approved";
              }else if($latest[1]['IsRejected'] == 1){
                echo "Rejected";
              }else if ($latest[1]['IsHold'] == 1) {
                echo "Hold";
              } ?> by
              <?php echo $latest[1][ 'PersonnelName']; ?><br>
              <?php echo $latest[1][ 'Position']; ?>
          </label>
        </fieldset>
        <fieldset>
          <label>
            <input type="checkbox" checked="checked" name="checkbox"> Edited by recruiter
          </label>
        </fieldset>
        <fieldset class="checkbox">
          <label>
              <input type="checkbox" value="" checked="checked" class="checkbox-mngr"><?php if ($latest[2]['IsProcessedToHire'] == 1) {
                echo "Approved";
              }else if($latest[2]['IsRejected'] == 1){
                echo "Rejected";
              }else if ($latest[2]['IsHold'] == 1) {
                echo "Hold";
              } ?> by
              <?php echo $latest[2][ 'PersonnelName']; ?><br>
              <?php echo $latest[2][ 'Position']; ?>
          </label>
        </fieldset>
        <fieldset class="checkbox">
          <label>
              <input type="checkbox" value="" checked="checked" class="checkbox-mngr"><?php if ($latest[3]['IsProcessedToHire'] == 1) {
                echo "Approved";
              }else if($latest[3]['IsRejected'] == 1){
                echo "Rejected";
              }else if ($latest[3]['IsHold'] == 1) {
                echo "Hold";
              } ?> by
              <?php echo $latest[3][ 'PersonnelName']; ?><br>
              <?php echo $latest[3][ 'Position']; ?>
          </label>
        </fieldset>
        <fieldset>
          <label>
            <input type="checkbox" checked="checked" name="checkbox"> Request Completed
          </label>
        </fieldset>

<!-- 
    	<table align="right">
    		<tr>
    			<td><?php if($req['IsProcessedToHire']=='1'){
                    echo "Approved";
                 }else if ($req['IsHold']=='1') {
                    echo "Hold";
                 }else if ($req['IsRejected']=='1') {
                    echo "Rejected";
                }
                 ?></td>
    			<td>by </td>
    			<td><?php echo $latest[0]['PersonnelName']; ?></td>
    		</tr>
            <tr>
                <td colspan="3"><?php echo $latest[0]['Position']; ?></td>
            </tr>
    	</table> -->
    </main>
    <footer>
      <!-- <p align="center"><?php echo date('Y-m-d');?></p> -->
    </footer>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
    document.write(new Date().toLocaleDateString());
    });
  </script>
</html>

