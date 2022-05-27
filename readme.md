#url
http://34.214.177.84:84/graph_all.html

#Deployment
####ssh
ssh -i ~/.ssh/devs.pem ec2-user@ec2-34-214-177-84.us-west-2.compute.amazonaws.com
####Folder on server
/var/www/html/equinox/EquinoxDashboard
####To get latest code
git pull origin master

#Retrieve results after import
select * from Equinox.ResultsFinal where Engagement ='AIDC2022';

#Add the coding for Q44
####Complete for values 1-9

Update Equinox.ResultsFinal
set `44`='Better communication from AIDC'
where `44`=9
and Engagement ='AIDC2022';

#Recode the 5's and 4's
####Complete for fields 1 to 43, remember to exclude 11 and 44.

Update Equinox.ResultsFinal
set `46`=3
where `46`=4
and Engagement ='AIDC2022';

Update Equinox.ResultsFinal
set `46`=4
where `46`=5
and Engagement ='AIDC2022';