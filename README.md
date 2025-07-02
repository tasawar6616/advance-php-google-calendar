# PHP Google Calendar API Integration

This is a simple PHP project demonstrating how to integrate the **Google Calendar API** using **OAuth2 authentication**.

---

## 📦 Features

- ✅ Google OAuth2 authentication flow
- ✅ Add calendar events programmatically
- ✅ Store and reuse access tokens
- ✅ Handle token expiration and refresh

---

## ✅ Requirements

- PHP >= 7.x
- Composer
- Google API PHP Client Library (`google/apiclient`)

---

## 🔑 .env Configuration

Create a `.env` file in your project root with the following variables:

```ini
GOOGLE_CLIENT_ID=your-client-id
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost/advance-php/oauth2callback.php
