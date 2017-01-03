# Instagram-API-Integration
Integrated Instagram APIs to fetch user information using PHP


#Setup

1) Upload all the files to a publically access able web server so that instagram can redirect user to your server after authentication.

2) Register application at http://instagram.com/developer/

3) On the registration form enter http://yourwebsite.com/instagram/redirect.php as redirect URI for "OAuth redirect_uri" field.

4) After creating the application you will get "CLIENT ID", "CLIENT SECRET" and "REDIRECT URI".

5) Copy those values and open config.php

6) Replace these values in appconfig array. Please note that redirect_url in appconfig should be same as "OAuth redirect_uri" value you entered while registering the App.

7) Start you server and hit index.php
