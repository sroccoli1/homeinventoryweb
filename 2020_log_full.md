# Home Inventory Web - 2020 Log

**My Web Dev journey detailed log**

## Contents
- [Home Inventory Web project](https://github.com/sroccoli1/homeinventoryweb)
- [2020 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2020_milestones.md)
- [2019 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2019_milestones.md)

## Week 17 (April, 27th)

### Briefly

**Week’s Progress:** 
  - Fixed a DB connection issue after migrating from Lubuntu 16 to Win 10. Figured out that a DB connection parameters was wrong.

       
              $servername = "localhost:3308"; //Correct port used by MySQL on Win 10
  - Wrote a script in case of future DB issues investigations.
  - Figured out a DB Admin Use Case. 

**Thoughts:** It was a tough week of investigation, I felt very uncapable, but diving into MySQL, PHP and Wampserver documentation with a bug perspective made me learn more than ever about these systems.  

**Link to tweet:** [@SRoccoli Week 17](https://twitter.com/SRoccoli/status/1259842830421327874?s=20)

**Link to work:** 
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/272ff0908963f6065edb6f94b122c1160a30435f)
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/87ed033f4a6f6a9299a08a2488706b3736041b0b)

### Full story

My Lubuntu installation for web development crashed and I may have to  reinstalled the  OS!<br>
Fortunately on a second partition, I had installed Win 10. I recreated my web dev environment, based on: <br>
- WAMPServer
- Notepad++
- Git<br> 

and pulled the HIW repository.
<br> As right there's no  installation and configuration process for Win 10 environment, it was really a good time to practice and write it. 

<br> I was expecting to start coding exactly where I left previously. But unfortunately, there was a problem of database connection, exactly where it was fine on Lubuntu.
<br>[**Can't save a new cardboard! :-(**](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A02-capture-error-1045.PNG)
  
    SQLSTATE\[HY100]\[1045] Access denied for user 'homeinventorydev'@'localhost' (using password: YES)<br>
    code: 1045
  
Investigation:
- Dived again in MySQL documentation
- Looked through similar issues on Stackoverflow
- Looked for MySQL v8.0 version changes
- Looked for Wampserver PDO plugin
- Looked for MySQL config file
- Changed the connection parameters, user login, user privileges multiple times 

<br> Finally I got it fixed! When I precised the port value used by MySQL <br>
![The port value used by MySQL](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A02-mysql-port-used.png) 
<br> Precised in the DB connection params:

    $servername = "localhost"; //Originally

<br> DB connection params, now updated:<br>
![Servername connection param updated](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A03-database-connect-param-updated.PNG)


<br> **New cardboard can be saved, problem solved!**
<br>![New cardboard can be saved!](https://github.com/sroccoli1/homeinventoryweb/blob/4305adb67d2b2933261d4cfc3ccf2a34cd95f31c/A03-cardboard-saved-into-db.PNG)

<br> After struggling so much: 
- I wrote couple of PHP PDO scripts that speed up DB, user, and tables creation/destruction => Ready to the next DB admin session!
- Specified GUI views for DB admin use case in user session: for DB, user, and tables creation and destruction. 
![UC DB Admin](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A04-DB-admin-uc-02.PNG)
![UC DB Admin](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A04-DB-admin-uc.PNG)
<br> Who long will it takes to implement this?

## Week 21 (May, 11th)

### 
