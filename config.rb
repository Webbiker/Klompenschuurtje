require 'compass/import-once/activate'
# Require any additional compass plugins here.

add_import_path "assets/bower_components/foundation/scss" # *magic*
add_import_path "assets/bower_components/slick-carousel/slick/" # *magic*

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "assets/css"
sass_dir = "assets/sass"
images_dir = "assets/img"
javascripts_dir = "assets/js"
fonts_dir = "assets/fonts"

output_style = :nested
environment = :development

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = true
color_output = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass assets/sass scss && rm -rf sass && mv scss sass
