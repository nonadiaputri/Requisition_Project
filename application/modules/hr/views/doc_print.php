
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
    			<td><?php echo $req['req_position']; ?></td>
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
    			<td>Status</td>
    			<td>:</td>
    			<td><?php echo $req['Status']; ?></td>
    		</tr>
    		<tr>
    			<td>Total Need</td>
    			<td>:</td>
    			<td><?php echo $req['NumberOfPlacement']; ?></td>
    		</tr>
    		<tr>
    			<td>Placement</td>
    			<td>:</td>
    			<td><?php echo $req['Department'];; ?></td>
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
        <?php if($req['IsProcessedToHire']=='1'){?>
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
        <br>

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
    			<td><?php echo $latest['PersonnelName']; ?></td>
    		</tr>
            <tr>
                <td colspan="3"><?php echo $latest['Position']; ?></td>
            </tr>
    	</table>
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

