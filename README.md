# OSTRICH-CMS

By: Joseph Rex a.k.a bl4ckdu5t.

email me for bugs: [joerex@ostrich-dev.com](mailto:joerex@ostrich-dev.com).

website: [ostrich-dev.com](http://ostrich-dev.com)


README FILE
___________________________________________________________________

If you have not gotten this copy of ostrich-dev from the main 
source (http://ostrich-dev.com/cms),and you'll like to make
reference to it or check for it some other time, you can always the
ostrich cms homepage -> http://ostrich-dev.com/cms

REQUIREMENTS
____________________________________________________________________

A web server like Apache
PHP version >= 5.3.7 for best results with database password hashing
MySQL server
(Windows users can get all those in a pack of WAMP or XAMPP)
A web browser
A human being with brains :P


DOCUMENTATION
____________________________________________________________________

ostrich-cms is developed to help manage pages and posts on a blog.
The database connection queries were made with PDO prepare statements
which prevents the websites from attacks like SQL injection attacks
Assuming professional intruders make their way to your database,
you don't have to get all so worried. I made proper use of the
ircmaxwell password compatibility library to use the password_hash()
function with Blowfish algorithm. 
Thanks to Anthony (http://github.com/ircmaxwell) for that. You can
check out more about this library at 
http://github.com/ircmaxwell/password_compat
From The PHPNW conference made by Anthony he tested that it will
take a really long time for a good intruder to bruteforce the
generated hashes or perform a rainbow-table attack. Only a few
hackers will get to the length of getting GPUs to bruteforce your
password hashes which wouldn't be easy as well.
I'll recommend you upgrade to PHP5.5 for best results but all will
be just fine if you are making use of a version higher than 5.3.7

INSTALLATION
_______________________________________________________________

After downloading the ostrich.zip from http://ostrich-dev.com/cms
1. Unzip the ostrich.zip file 
-----------------------------
Windows users can use winrar
unix users can make either use the archive manager or open from the
terminal with 'unzip ostrich.zip'

2. Copy the files to your web server
---------------------------------------------------------------
Copy the files to your WWW foler.
On Linux, it can be found at '/var/www'
For windows wamp users 'C:\wamp\www'
For windows xampp users 'C:\xampp\htdocs'

3. import the database
---------------------------------------
Among the files imported to your server, there is a file named ostrich.sql
This is the database file. Create a database and import this file into it

4. Configuration
--------------------------------------------
To configure your ostrich cms website to make use of the imported database and all
your MySQL configurations, locate the file 'includes/config.php' in the ostrich
folder and edit it with the required options as stated with the comments.

More themes can be used with ostrich. You can copy the construct of the
default theme -> darkwood and build your own themes configuring ostrich to make use
of them.

This version of Ostrich does not have a friendly inteface for you to configure
your website settings so there is an account created by default for you with the
credentials below:

	username: admin
	password: password

Login URL: `http://your-ostrich-website/ost-admin`

oncd logged in with this default credentials, user can make new users and delete
the default account.

The rest of the website settings can be done from the config.php file

Now you can enjoy ostrich! tadda! 

Fork and star ostrich on github
[http://github.com/bl4ckdu5t/ostrich](http://github.com/bl4ckdu5t/ostrich)

I'm also a freelance web developer and you can give me your web projects to get
your best and desired web applications/ websites.
