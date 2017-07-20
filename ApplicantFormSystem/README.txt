
Due to the recent news of another form being added (A temp form for trades/labor work) I have
Decided to break the Temp form process up into 4 seperate Files. 


eduEmpStat.html:
Question related to Education and employment status

areaOfExp.html
Questions related to skills for ALL OF accouting, labour, trades and hospitality

avalLog.html
Questions related to avaliability and Logistics

submit.html
Alternative Reference information, Upload buttons for 3 different files, terms of agreement and submit button



Unfortunately Maria has decided that to better streamline the Temp form process the questions should be asked on different pages
to prevent the user from having to dig through one massive form sheet. Because of this, after hitting the "next" button on each
inidvidual page, the data from the previous page will have to be stored in session variables which are processed from stand alone
.php files (OR) you could have one "Proccess file" that checks which "next" button was clicked with an if(isset) statement then stores
the data from within the if(isset) statement.

