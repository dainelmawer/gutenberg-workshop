# Gutenberg Block Tutorial
This repo attempts to provide a run down of building a Gutenberg block in the most efficient way possible, with the least configuration. Its for developers and engineers who wish to have a no fuss setup for Gutenberg Block development. Many block tutorials require complicated setup and configuration before you even get started which has its pros and cons of course. In this tutorial, I will get you up and running with a fresh new WP installation, a plugin to support your block development, individual blocks and the core Gutenberg plugin in under 3 minutes.

## Getting Started

- Im assuming that you already have a local development environment thats conducive to running WordPress, if you dont...consider using Laravel Valet, or 10ups WP Local Docker.

- The next thing to tackle is WP CLI. If you dont have it setup, head over here. The latest stable version of WP CLI is 1.5.1 if you're running anything below that I'd suggest you update by running `wp cli update` otherwise you wont have access to the new `scaffold` commands.

That should take care of the basics. Now we're ready to jump in. Lets get an instance of WordPress going, navigate to your site folder:

```

wp core download
wp config create
wp core install --url=gutenberg.test --title=Gutenberg --admin_user=administrator --admin_password=iamthematrix --admin_email=hello@gutenberg.test

wp plugin install gutenberg --activate

wp scaffold plugin <name-of-plugin>

wp scaffold block <name-of-block> --title="<Name of Block>" --plugin=<name-of-plugin>

wp plugin activate <name-of-plugin>

```

## Directory Structure

![A look at the directory structure of our scffolding above](https://cl.ly/0R1A3I063S0s/Image%202018-05-12%20at%209.12.54%20AM.png)

## A Simple Block Tutorial
Lets create a simple Gutenberg Block to begin. We'll move onto a more complicated one a bit later. 
Heres what its going to do:



## License
GPL 2.0 or later

## Support my work
The plugin is free to use, but I develop in my spare time, if you're happy with the development of the plugin, or want to see new features, please post an issue and support my work by making a donation: https://www.paypal.me/dainemawer

