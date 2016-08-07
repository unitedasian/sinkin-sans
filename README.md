SinkinSans Font Bundle
======================

The SinkinSansBundle loads the [SinkinSans](https://www.fontsquirrel.com/fonts/sinkin-sans) font families into your symfony project.

If your project uses the [AsseticBundle](http://symfony.com/doc/current/assetic/asset_management.html), the fonts are made available as [assetic named assets](http://symfony.com/doc/current/assetic/asset_management.html#using-named-assets).

Installation
------------

Update the project's `composer.json` file as follows:

```
{
	"repositories": [
		{
			"type": "composer",
			"url": "http://satis.united-asian.com/fonts"
		}
	],
	require: {
		"fonts/sinkin-sans": "dev-master"
	}
}
```

Configuration
-------------

Define the bundle's `mode` via its configuration. The default value is `individual`.

```yml
sinkin_sans:
	mode: single|individual
```

Usage
-----

### `single` mode

In `single` mode, a single **Sinkin Sans** font is defined, available in 9 different weights.

Include the `sinkin-sans.css` stylesheet in your page template using one of the 3 methods below:

#### Direct include
```html
<link href="bundles/sinkinsans/css/sinkin-sans.css" rel="stylesheet" type="text/css">
```

#### Use assetic's `javascripts` twig tag

```html
{% stylesheets filter="cssrewrite"
    "bundles/sinkinsans/css/sinkin-sans.css"
%}
{% endstylesheets %}
```

#### Use assetic's `javascripts` twig tag with the bundle's formula

```html
{% stylesheets filter="cssrewrite"
    "@sinkin_sans"
%}
{% endstylesheets %}
```

In your stylesheet, apply the font to the elements of you choice via the `font-*` CSS rules, as per the example below:

```css
body {
	font-family: "Sinkin Sans", sans-serif;
}

h1 {
	font-weight: 600;
}

.italic {
	font-style: italic;
}
```

### `individual` mode

In `individual` mode, seperate fonts are loaded for each weight. In most cases, your app will only use a subset of all the available font's weights. Rather than load them all, this mode allows you to load only what you require. This is the bundle's default mode.

Each font weight is define in a separate stylesheet and is represented by a different assetic named asset:

* Sinkin Sans Thin: sinkin-sans-100.css (`@sinkin_sans_100`)
* Sinkin Sans ExtraLight: sinkin-sans-200.css (`@sinkin_sans_200`)
* Sinkin Sans Light: sinkin-sans-300.css (`@sinkin_sans_300`)
* Sinkin Sans: sinkin-sans-400.css (`@sinkin_sans_400`)
* Sinkin Sans Medium: sinkin-sans-500.css (`@sinkin_sans_500`)
* Sinkin Sans SemiBold: sinkin-sans-600.css (`@sinkin_san_6100`)
* Sinkin Sans Bold: sinkin-sans-700.css (`@sinkin_sans_700`)
* Sinkin Sans Black: sinkin-sans-800.css (`@sinkin_sans_800`)
* Sinkin Sans ExtraBlack: sinkin-sans-900.css (`@sinkin_sans_900`)

Note that in this mode each weight is a separate font with a different name.

Each font weight includes both normal and italic styles.

Include the relevant stylesheets into your template as per the example below. In this case we are loading the `Sinkin Sans`, `Sinkin Sans ExtraLight` and `Sinkin Sans Bold` fonts (of respective weights 400, 200 and 700).

#### Direct include
```html
<link href="bundles/sinkinsans/css/sinkin-sans-400.css" rel="stylesheet" type="text/css">
<link href="bundles/sinkinsans/css/sinkin-sans-200.css" rel="stylesheet" type="text/css">
<link href="bundles/sinkinsans/css/sinkin-sans-700.css" rel="stylesheet" type="text/css">
```

#### Use assetic's `javascripts` twig tag

```html
{% stylesheets filter="cssrewrite"
    "bundles/sinkinsans/css/sinkin-sans-400.css"
    "bundles/sinkinsans/css/sinkin-sans-200.css"
    "bundles/sinkinsans/css/sinkin-sans-700.css"
%}
{% endstylesheets %}
```

#### Use assetic's `javascripts` twig tag with the bundle's formula

```html
{% stylesheets filter="cssrewrite"
    "@sinkin_sans_400"
    "@sinkin_sans_200"
    "@sinkin_sans_700"
%}
{% endstylesheets %}
```

In your stylesheet, apply the font to the elements of you choice via the `font-*` CSS rules, as per the example below. Make sure to use the appropriate font name for each weight. There is no need to specify the `font-weight`, since it is already part of the font definition.

```css
body {
	font-family: "Sinkin Sans", sans-serif;
}

h1 {
	font-family: "Sinkin Sans Bold", sans-serif;
}

.italic {
	font-family: "Sinkin Sans ExtraLight", sans-serif;
	font-style: italic;
}
```
