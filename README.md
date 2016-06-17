# Hello Child Theme

This theme is a custom-built [Genesis](http://my.studiopress.com/themes/genesis/) and [Fulcrum](https://github.com/hellofromtonya/Fulcrum) powered child theme for [Hello Life blog](http://hellofromtonya.com/blog).  It's built in a DRY, modular, clean, purposeful fashion.  Check it out. Use it in your own projects.

## A word about theme vs. plugin from Tonya

Remember that a child theme's intents are (1) to customize the [Genesis](http://my.studiopress.com/themes/genesis/) framework, as it does the heavy lifting for you, and (2) provide the styling and personality for your website.  I want you to resist the temptation of putting everything into the theme.  Don't do it. Features like custom post types, taxonomies, shortcodes, widgets, etc. do not belong in a theme. Nope, put those into a plugin.

## Cool Features:

These child theme has some cool features and encompasses what I teach on [Know the Code](https://knowthecode.io).

1. Clean, modular, DRY, and purposeful.
2. Configurable through config files
3. Theme version is set by the stylesheet and then stored in a `CHILD_THEME_VERSION` for easy use.  [Fulcrum](https://github.com/hellofromtonya/Fulcrum) takes care of this for you. And when you are in development mode, i.e. as specified in the `wp-config.php` file with a `define( 'FULCRUM_ENV', true );`, the child theme's version is set to the stylesheet's file date and time.
4. [Sass](http://sass-lang.com/) is my choice to keep the CSS modular.
5. [Bourbon](http://bourbon.io/) and [Neat](http://neat.bourbon.io/) remove some redundancies as they provide needed mixins for you to that cool stuff done.
6. You need a task runner to compile the Sass and compress your assets.  My task runner of choice is gulp.  This theme includes a modular gulp task setup.
7. Files are autoloaded for you in the `lib/functions/autoload.php` file.  If you add more files or change what I have loaded, go to this file and make your changes.
8. The file/folder architecture follows the [Genesis](http://my.studiopress.com/themes/genesis/) framework for ease of finding what you need.
9. You won't find HTML in the business logic.  Nope silly, all of the HTML are views.

## Dependencies

Yup there are dependencies that you will need to have on your local development machine and in your project.  Let's walk through them.

1. [Genesis](http://my.studiopress.com/themes/genesis/) is my theming framework of choice
2. [Fulcrum](https://github.com/hellofromtonya/Fulcrum) is my custom core plugin, as it powers all of my sites.  It is the central library to keep my sites clean, DRY, and modular.
3. [Fulcrum Site](https://github.com/hellofromtonya/fulcrum-site) handles the site specific stuff including loading up Font Awesome, shortcodes, smooth scroll, and more.
4. Node, npm, and gulp - You need these installed on your local dev machine in order to use gulp.

### Optional Dependencies

Here is a list of optional dependencies:

1. [Catfish](https://github.com/hellofromtonya/catfish) sticky footer used on [Hello Life blog](http://hellofromtonya.com/blog/).
2. [Ninja Forms](https://ninjaforms.com/) - my go-to for all of my WordPress form needs

## Instructions to install:

This theme requires a few thingies to be installed and setup before you can rock this custom child theme. Ready? Let's get going....

1. Install the [Fulcrum](https://github.com/hellofromtonya/Fulcrum), the central custom repository plugin for WordPress.  I put this as a must-use plugin.
2. Open up terminal and navigate to the `themes` folder.
3. Then type: `git clone https://gitlab.com/hellofromtonya/hello-child-theme.git`
4. Rename the folder to what you want.  For this example, we'll call it `hello`.
4. 'cd hello`
5. Let's get the task runner ready to rock for you.  Type: `npm install --save-dev`. In doing so, node creates a new folder called `node_modules` and loads in all the dependencies.
6. WooHoo are you ready to customize it for yourself.

## Customizing

This entire theme is written in a modular, clean fashion.  You might not be used to this sort of structure.  With any theme, the launching point is the `functions.php` file.  Open up that file now and you'll see that there is very few lines of code.  It truly serves as the launching point.  Then it serves up the setup file, which handles setting up the theme.

The file structure follows the [Genesis](http://my.studiopress.com/themes/genesis/) architecture to keep things the same and for easily finding what you are looking for in the child theme.  Structures are in `structure` for example.  But unlike Genesis, HTML is separated from the business logic and is found in the `views`.

Functionality and features are not contained in the theme itself.  Nope, themes are for styling and presentation only, as they are skins.  All functionality and features are add-on plugins, which extend off of [Fulcrum](https://github.com/KnowTheCode/fulcrum).  Any custom post types, taxonomies, settings, options, and whatever are separated from the theme itself.  This architecture allows us to switch themes without affecting functionality or having to copy the code from one theme into another.

### Theme Configuration

You might have noticed that the `functions.php` is very skinny.  Yup, this theme uses configuration over code.  So instead of having a bunch of `add_theme_support` or `add_image_size`, instead you configure what you want in the `config/theme.php`.  Just follow the instructions in that file.  Fulcrum then handles all of the setup for you. Whew, that saves you so much code and work from project-to-project.

### Styling

To make styling changes, navigate to `assets/sass`.  There you will find each of the partial files which contain the CSS styling.  Everything is broken up into small modular partial files.  Within each folder is an `index.scss` file.  This file serves to gather up all of the partials within the folder.  Then you import the `index` files into your main stylesheet.

#### Colors

To change the color scheme, you go to `utilities\variables\_colors.scss`.  You can adjust the colors there.  Notice that the hex color codes are assigned to a variable.  The variable is then used within the partials.  So if you want a different variable, you'll need to do a search and replace.

#### Typography

To change the fonts, you go to `utilities\variables\_typography.scss`.  You can load in whatever fonts you want.  You'll also need to go into the assets loader and

The variables are setup for our color scheme.  Therefore, you want to use the variables found in the `_variables.scss` file.  For example, let's say that you want the background-color to be our branding green color.  You would use `$green` as the color.  This variable holds the hex color.

### Gulp

When you are actively making styling changes, you need to convert the Sass files into a compressed CSS file.  To do this, in terminal, type `gulp watch` at the root of the theme folder.  Let it run as you make styling changes.  Refresh your browser to see the live changes on your local sandbox site.
