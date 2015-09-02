# Cluster Snack Reminders
Advisory group (cluster) meeting snack automated email reminders


Live at http://bit.ly/clustersnack

Made for SF University High School students and faculty

This web app will send users an email reminder at 2:30 p.m. the day before they are signed up to bring food
for their advisory groups (clusters). Users can append as many fields as they need to the sign-up form. After submission,
the app enters the input into a MySQL database, and the web server runs a script every day (set up via a cron job)
to send the reminder emails needed.

Note: PHPMailer needs to be installed in the root folder.
