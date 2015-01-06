// Log all cookies into the console
console.log( document.cookies );

// Force the cookie to expire
document.cookie = 'PHPSESSID=; expires=Mon, 01 Jan 1888 00:00:00 GMT'; 

// Hijacking a cookie, JS style
document.cookie = 'PHPSESSID=82d97fa55120b4661b7335b664a98ce3;';