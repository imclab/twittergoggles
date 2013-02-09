Data Collection:
Adam A.
Greg T.
Kevin U.
Kyle S.

Files included: 
Data_Collection.php


Requirements:
**************************************
Data Collection -
Input - The input should be obtained by the twitter search API.  There is example code in the Github repository which you may use and refine. 

To decide what tweets to collect, you will read from the "job" table, which contains a Twitter search string and the frequency of collection (how many minutes between executions of that query).  Again, there is example code that you may reuse.  Since you will be addressing thousand's of tweets at once you will need to consider how to store or contain them.  

Connection Point - You should also consider discussing this with the Persistence team.  What kind of data will they want?  You do not need to implement the connection in this lab; but its worth thinking a little bit ahead.

Output - Your goal is to create a PhP module that *only* gathers the data and formats it according to some specific structure.  Candidate structures are .csv, json and XML.  JSON is the way it is delivered from the API. 

**************************************