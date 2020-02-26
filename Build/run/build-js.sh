#!/bin/bash

mkdir -p ../Resources/Public/JavaScript

## default js build steps
rm -rf ../Resources/Public/JavaScript/*.*

cat js/vendor/*.js > vendor.js
cat js/components/*.js > build.js

    # node_modules/ie11-custom-properties/ie11CustomProperties.js \

npx concat-cli -f \
    vendor.js \
    build.js \
    js/script.js \
    --output ../Resources/Public/JavaScript/script.js

rm -f build.js
rm -f vendor.js

if [[ $1 = "prod" ]]; then
    npx eslint js/components/**/*

    npx uglifyjs ../Resources/Public/JavaScript/script.js \
        --compress --output ../Resources/Public/JavaScript/script.js

    echo 'JavaScript Ready'
fi
