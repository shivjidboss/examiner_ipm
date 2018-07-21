<?php
if(isset($_SESSION['userid']) && $_SESSION['authority']=="admin")
					echo("<a class='sdbarlinks' href='adminprofile.php'>Home</a><br>
					
					<div class='menul1'><li class='sdbarlinks'>Manage QPs</li><div>
					<a class='sdbarlinksl2' href='manageqp.php'>View QPs</a>
					<a class='sdbarlinksl2' href='qnpcreator.php'>Create QP</a>
					<a class='sdbarlinksl2' href='managecourse.php'>Manage Courses</a><br>
					</div></div>
					<div class='menul1'><li class='sdbarlinks'>Manage Students</li><div>
					<a class='sdbarlinksl2' href='signup.php'>SignUp Student</a>
					<a class='sdbarlinksl2' href='searchuser.php'>Search Student</a>
					<a class='sdbarlinksl2' href='edituser.php'>Edit Student Details</a>
					<a class='sdbarlinksl2' href='studentlist.php'>Student List</a><br>
					<a class='sdbarlinksl2' href='unsign.php'>Delete Student</a><br>
					</div></div>
					<div class='menul1'><li class='sdbarlinks'>Random Qns</li><div>
					<a class='sdbarlinksl2' href='randomsetting.php'>Setting</a><br>
					<a class='sdbarlinksl2' href='randomsettingsbank.php'>Bank</a>
					</div></div>
					<div class='menul1'><li class='sdbarlinks'>Practise Test</li><div>
					<a class='sdbarlinksl2' href='practisetestsettings.php'>Setting</a><br>
					<a class='sdbarlinksl2' href='practisetestbank.php'>Bank</a>
					</div></div>
					<div class='menul1'><li class='sdbarlinks'>Extras</li><div>
					<a class='sdbarlinksl2' href='notificationbank.php'>Notifications</a>
					<a class='sdbarlinksl2' href='rankindex.php'>Rankings</a>
					<a class='sdbarlinksl2' href='newcontentcreator.php'>Add Content Creator</a><br>
					<a class='sdbarlinksl2' href='ccunsign.php'>Remove Content Creator</a><br>
					</div></div>");
					
				
				else if(isset($_SESSION['userid']) && $_SESSION['authority']=="content")
					echo("<a class='sdbarlinks' href='adminprofile.php'>Home</a><br>
					<a class='sdbarlinks' href='managecourse.php'>Manage Course</a><br>
					<a class='sdbarlinks' href='qnpcreator.php'>Create QP</a><br>
					<a class='sdbarlinks' href='manageqp.php'>View QPs</a><br>");
				
				else
					echo("Credentials not valid!");
				
				echo("<a class='sdbarlinks' href='logout.php'>Logout</a><br>");
?>