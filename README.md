WIP

Override [lithium](https://github.com/UnionOfRAD/lithium) render engine to provide to the framework theme management.

# Installation

Checkout the code to either of your library directories:

    cd libraries
    git clone https://github.com/CINEMUR/li3_themes.git

Include the library in in your `/app/config/bootstrap/libraries.php`

    Libraries::add('li3_themes');

Make sure that your `www` user has the correct right to create the `themes` folder in webroot and move the existings views in `app/webroot/themes/default/`.
The arborescence is like this:

    app
        |webroot
            |themes
                |default
                    |views
                        |layout
                        |_error
                        |page
                    |css
                    |js
                    |img
                |mytheme
                    |views
                        |layout
                        |_error
                        |page
                    |css
                    |js
                    |img


### APACHE

Protect your views PHP files by adding those 2 lines in `app/webroot/.htaccess`

    RewriteCond %{REQUEST_URI} ^/themes/.*/views
    RewriteRule .* / [R,L]

### NGINX


# Usage
Select your theme in your `controller`.

    $this->render(array('theme' => 'mytheme'));

If no theme is set, the default theme is used.