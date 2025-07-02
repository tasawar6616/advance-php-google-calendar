# PHP Google Calendar API Integration

This is a simple PHP project demonstrating how to integrate Google Calendar API using OAuth2 authentication.

## Features:

- Google OAuth2 authentication
- Add calendar events
- Store and reuse access tokens
- Token expiration handling

## Requirements:

- PHP >= 7.x
- Composer
- Google API PHP Client Library

## .env Configuration:

Make a `.env` file like this:

GOOGLE_CLIENT_ID=your-client-id
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost/advance-php/oauth2callback.php

markdown
Copy
Edit

## Running:

1. Install dependencies:

composer install

bash
Copy
Edit

2. Start a local server (xampp/wamp or PHP built-in server).

3. Go to:  
`http://localhost/advance-php/`

## License:

MIT
