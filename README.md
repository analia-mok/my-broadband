# (INCOMPLETE) My Broadband

Account dashboard for a customer to manage their internet, TV, and phone services.

## Project Setup

* Install the latest stable version of [Lando (v.3.6.2)](https://github.com/lando/lando/releases)
* Have the latest Docker Desktop v3.6.x installed
  * If you've installed Docker via Lando, you'll be fine.
* Clone this repo and cd into it
* Copy the given `.env.example` into your own `.env` file
  * If you are using the provided lando configuration, your local database and mailhog settings will already be available.

* Run `lando start`
* Run `lando setup`
  * This is a one-time setup script that will run:
    * composer install
    * Generates and sets your application key
    * Runs seeders which will provide you with sample data to work with
    * `php artisan storage:link` which will setup a symlink your public disk

* Run `lando npm install`
* Run `lando npm run prod`
* You should now be good to visit https://my-broadband.lndo.site :tada:

The entire applications is auth-restricted. Default local login is:

Username: `superadmin`
Email: `superadmin@example.com`
Password: `password123`

You can change your local default login by updating the following variables
founds towards the bottom of your local `.env`

```
DEFAULT_USERNAME=
DEFAULT_USER_EMAIL=
DEFAULT_PASSWORD=
```

## Available Commands

**Note: This is an older project that will most likely not be updated anytime soon. It
is recommended that you run most of your typical tooling through Lando to ensure you
are running the correct tooling versions**

### Composer

Run *composer* commands via:

```
lando composer
```

### Artisan

Run *artisan* commands via:

```
lando artisan
```

### NPM

Run *npm* commands via:

```
lando npm
```

For development, use:

```
lando npm run dev
```

For production, use:

```
lando npm run prod
```

### Xdebug

By default, xdebug will be enabled on `lando start`. But if you have a need for speed,
and don't need debugging enabled, you can run:

```
lando xdebug-off
```

Similarly, xdebug can be toggled back on using:

```
lando xdebug-on
```

## Features List / Hopes & Dreams

- [X] Equipment
- [ ] Data Usage
- [ ] Database index for querying data usage for a device.
- [ ] Billing
- [ ] Rewards
- [ ] Services

### Later/Post-MVP

- [ ] Autopopulate a device's address while editing a device's serial number.
- [ ] Look into [iSeed](https://github.com/orangehill/iseed)

## Resources

- [Laravel Jetstream - Livewire Version](https://jetstream.laravel.com/2.x/introduction.html)
- [Spatie Enums](https://spatie.be/docs/enum/v3/introduction)
- [Livewire Charts](https://github.com/asantibanez/livewire-charts)
