# Gutenberg Block Tutorial
This repo attempts to provide a run down of building a Gutenberg block in the most efficient way possible, with the least configuration. Many block tutorials require complicated setup and configuration before you even get started which has its pros and cons, of course. In this tutorial, I will get you up and running with a fresh new WP installation, plugin and gutenberg in under 5 minutes.

## Getting Started

- Im assuming that you already have a local development environment thats conducive to running WordPress, if you dont...consider using Laravel Valet, or 10ups WP Local Docker.

- The next thing to tackle is WP CLI. If you dont have it setup, head over here. The latest stable version of WP CLI is 1.5.1 if you're running anything below that I'd suggest you update by running `wp cli update` otherwise you wont have access to the new `scaffold` commands.

That should take care of the basics. Now we're ready to jump in. Lets get an instance of WordPress going, navigate to your site folder:

```
// Bring down a fresh WP installation and set it up

wp core download
wp config create
wp core install --url=gutenberg.test --title=Gutenberg --admin_user=administrator --admin_password=iamthematrix --admin_email=hello@gutenberg.test

// Lets take care of Gutenberg

wp plugin install gutenberg --activate

// Lets scaffold a plugin

wp scaffold plugin <name-of-plugin>

// Lets scaffold a gutenberg block and tie it to our plugin

wp scaffold block <name-of-block> --title="<Name of Block>" --plugin=<name-of-plugin>

wp plugin activate <name-of-plugin>

```


## License
GPL 2.0 or later

## Support my work
The plugin is free to use, but I develop in my spare time, if you're happy with the development of the plugin, or want to see new features, please post an issue and support my work by making a donation: https://www.paypal.me/dainemawer

