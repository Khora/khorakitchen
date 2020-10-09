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
### Fixer API key to get the current course Pounds to Euros
Place a new empty file with the name "fixerApiKey.php" in that newly created "config" folder.
Put this content in there:
&lt;?php $fixerApiKey = "ce2671326bad54fad4344cae257a0e20"; ?&gt;
Replace "ce2671326bad54fad4344cae257a0e20" with a valid free API key from https://fixer.io/.
### PayPal E-Mail Address to which the Donations in Euro shall go
Place a new empty file with the name "emailForPayPal.php" in that newly created "config" folder.
Put this content in there:
&lt;?php $emailForPayPal = "email-address@test.com"; ?&gt;
Replace "email-address@test.com" with an E-Mail address linked to the PayPal account to which the donations shall go.
### E-Mail Address to which the Messages shall go
Place a new empty file with the name "emailForMessages.php" in that newly created "config" folder.
Put this content in there:
&lt;?php $emailForMessages = "email-address2@test.com"; ?&gt;
Replace "email-address2@test.com" with an E-Mail to which the messages on the "Thank You" page shall be sent to.
### PayPal credentials
Place a new empty file with the name "payPalCredentials.php" in that newly created "config" folder.
Put this content in there:
&lt;?php $payPalCredentials = "AUdUWv_vtb5szg-sbLRGVrsXoFsbXoD-DXX3Gux19cNkCaJRhSzEeP23WrQ_5Bc1D3pXDhgkBrkFzraL:BG1RNEyXNdS8ZO_Qhy1L2Yy1lEq14gDtuV0rF-SLi21V9-dHh-4TLngqbOI9_kyEM4B5qQVx82Gc749s"; ?&gt;
Replace "AUdUWv_vtb5szg-sbLRGVrsXoFsbXoD-DXX3Gux19cNkCaJRhSzEeP23WrQ_5Bc1D3pXDhgkBrkFzraL:BG1RNEyXNdS8ZO_Qhy1L2Yy1lEq14gDtuV0rF-SLi21V9-dHh-4TLngqbOI9_kyEM4B5qQVx82Gc749s" with valid PayPal API credentials for the account the donations in Pounds and the recurring donations shall go to.
IMPORTANT: this is concatenated client_ID:secret for the OAuth2 process!
### Data Folder
Create a folder called "data" in the main project folder.
Make sure it is writeable by the webserver program!

# When the System runs
## Set Properties
It is possible to set the current amount of collected donations and the total target amount of donations.
To set the current amount of collected donations, navigate to "http(s)://&lt;path/to/system&gt;/madebykhora/setValues.php?current=&lt;new value&gt;"
To set the target amount of collected donations, navigate to "http(s)://&lt;path/to/system&gt;/madebykhora/setValues.php?target=&lt;new value&gt;"
&lt;path/to/system&gt; is the server address where the system is running.
&lt;new value&gt; is the new value you want to be stored on the system.
