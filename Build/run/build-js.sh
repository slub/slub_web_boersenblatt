#!/bin/bash

## default css build steps
rm -rf ../Resources/Public/JavaScript/*.*

cat js/vendor/*.js > vendor.js
cat js/components/*.js > build.js

    # node_modules/ie11-custom-properties/ie11CustomProperties.js \

npx concat-cli -f \
    vendor.js \
    build.js \
    js/app.js \
    --output ../Resources/Public/JavaScript/app.js

rm -f build.js
rm -f vendor.js

if [[ $1 = "prod" ]]; then
    npx eslint js/components/**/*

    npx uglifyjs ../Resources/Public/JavaScript/app.js \
        --compress --output ../Resources/Public/JavaScript/app.js

    echo 'JavaScript Ready'
fi
