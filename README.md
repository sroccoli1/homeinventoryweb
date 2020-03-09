# homeinventoryweb
## Managing your cardboard boxes for your next move !
### It helps to inventory your staff, evaluates how much it weights, so  contracting with a moving company becomes easy!<br>homeinventoryweb a web development self-learning project developed by sroccoli1.<br>The digital twin of your staff! 

#### Problems when preparing your next move

From experience, moving is often a painstaking, slow but necessary process. Fortunately when one can get help from family or friends or from a moving company, travelling becomes easier. But there is always hassle when to comes to packing, inventoring and unboxing. Here is a list of some of the problems that we may encounter:
1. The moving date is much too close, not leaving time to organise, and with sleep debt. So we end up forgetting what is in which cardboard. After the move, searching for staff become a time consuming challenge. (Time constraint.)
2. The international moving company must respect a truck load limit when it reaches a country border, crossing on a ferry. When it is over the limit, the moving cost shifts to the upper truck price category. So you must know the global weight a of your move, thus the load of each cardboard or items. (Weight constrainst.)
3. The volume of your move must fit in the truck. (Volume constrainst.)
4. The moving company has requested you for a full inventory of your staff so that :
  - before the moving you and the company know the value of your staff, which can be used with insurance in case of loss ;
  - at destination you can check out all your staff. 

#### homeinventoryweb solution

3 main usages : 
- Inventory at the moving departure place (Answer to : where is what ? In which cardboard is what?) 
- Inventory checker at the destination place
- Weight limit and overall value superviser   

#### homeinventoryweb features

I have noticed the movables weight is over the limit... I can save this configuration for later, unselect items and set a new configuration… and save them for later (without deleting).
Tired of entering data with the GUI? You can instead edit the inventory in XLS then upload it and use the services. 

Record items and add them to their cardboard!
View the global : number of cardboard and moving weight!
Record item info such as name, weight, purchase date, purchase price, and even picture !
Dispatch them each to a cardboard (cardboard ID)!
Quick check on cardboards with their color tag!
Inventory can be sent to the insurance company for accidental cases. 

#### homeinventoryweb technical features

Desktop, web & mobile app
Synchronize with Cloud (multi-user)
Or mode 100% online : web app (creating an account on the website)

## Getting Started (Dev and Test)
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites (Linux workstation)
- You have sufficient rights to install packages using sudo
- You are familiar with Terminal and with these commands ls, cd, cp, rm

### Install on Linux workstation, single user mode
1. Download the HomeInventoryWeb code archive [from Git](https://github.com/sroccoli1/homeinventoryweb) (repository not yet public).
2. Unpack it and let it wait until step 5 .
3. Install a [LAMP](https://en.wikipedia.org/wiki/LAMP_%28software_bundle%29) (Linux-Apache-MySQL-PHP) server following [these instructions from step 1 to 3 (in French)](https://doc.ubuntu-fr.org/lamp#installation).
4. Config LAMP :
  1. [Create working directory, for instance public](https://doc.ubuntu-fr.org/tutoriel/lamp_repertoires_de_travail#mise_en_place_d_un_espace_public). At this point, you can open index.html in your browser, pointing at localhost.
  2. Put the code in this working directory.
  3. Delete the previously created index.html.
  4. At this point, you can open HomeInventoryWeb in your browser, pointing at localhost.
5. Set up the database :
  1. [Create a DB and its associated user](https://doc.ubuntu-fr.org/mysql#creer_une_base_de_donnees_et_un_utilisateur_qui_lui_est_associe)
  2. Create the DB tables : in your browser go to localhost, you’ll see a list of files. Click on createtables.php to create the tables.

Congrats, you can start using HomeInventoryWeb!
