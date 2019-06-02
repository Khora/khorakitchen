# madebykhora
Website for fundraising for the Khora Community Kitchen.

# Setup
## Setup
Place all the files and folders of this repo on a PHP-enabled webserver.
Do not include the files ".gitignore" and "README.md".
Do not include the folder ".git".
## Configuration
### Configuration Folder
Create a folder called "config" in the main project folder.
Place a new empty file with the name "fixerApiKey.php" in that newly created "config" folder.
Put this content in there:
&lt;?php $fixerApiKey = "ce2671326bad54fad4344cae257a0e20"; ?&gt;
Replace "ce2671326bad54fad4344cae257a0e20" with a valid free API key from https://fixer.io/.
### Data Folder
Create a folder called "data" in the main project folder.
Make sure it is writeable by the webserver program!

# When the System runs
## Set Properties
It is possible to set the current amount of collected donations and the total target amount of donations.
To set the current amount of collected donations, navigate to "http://&lt;path/to/system&gt;/madebykhora/setValues.php?current=&lt;new value&gt;"
To set the target amount of collected donations, navigate to "http://&lt;path/to/system&gt;/madebykhora/setValues.php?target=&lt;new value&gt;"
&lt;path/to/system&gt; is the server address where the system is running.
&lt;new value&gt is the new value you want to be stored on the system.