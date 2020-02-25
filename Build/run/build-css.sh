#!/bin/bash

## default css build steps
rm -rf ../Resources/Public/Styles/*.*

if [[ $1 = "fix" ]]; then
    npx stylelint --fix ./scss '**/*.scss'
fi

npx node-sass ./scss/main.scss --output ../Resources/Public/Styles \
    --output-style expanded --source-map true --quiet

npx postcss --use autoprefixer  --map=false \
    --replace ../Resources/Public/Styles/*.css

if [[ $1 = "prod" ]]; then
    npx stylelint ./scss '**/*.scss'

    npx csso --comments none --input ../Resources/Public/Styles/rte.css \
        --output ../Resources/Public/Styles/rte.css

    npx csso --comments none --input ../Resources/Public/Styles/style.css \
        --output ../Resources/Public/Styles/style.css

    echo 'Styles Ready'
fi
