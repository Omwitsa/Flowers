## Update Env file

Copy .env.example file and rename it to .env. Modify properties to match your settings.

## Package Update

Run npm install, npm run build, composer update

## Deployment

- Cut public content into the root folder. Exclude storage folder if present in the public folder.
- Modify the index file to read autoload and bootstrap from the root folder
- Modify .evn file to match the appriopriate production properties
