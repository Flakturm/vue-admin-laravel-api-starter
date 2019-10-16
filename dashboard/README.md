## Installation

```bash
# enter directory
cd dashboard

# install dependency
npm install

# develop
npm run dev
```

This will automatically open up http://localhost:9528

## Environments

Environment variables can be set in **.env.development**, **.env.staging** and **.env.production**

## Connect to the API server

In .env.xxxxx. Set the variable to your api server address.

```
VUE_APP_BASE_API = ''
```

## Build

```bash
# build for test environment
npm run build:stage

# build for production environment
npm run build:prod
```

## Advanced

```bash
# preview the release environment effect
npm run preview

# preview the release environment effect + static resource analysis
npm run preview -- --report

# code format check
npm run lint

# code format check and auto fix
npm run lint -- --fix
```
