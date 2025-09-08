FROM webdevops/php-apache-dev:8.1

# Update and install necessary packages
RUN apt-get update && apt-get install -y git

# Copy the existing application code into the Docker container
COPY . /app
COPY ./assets /app/assets
COPY ./content /app/content

# Set correct permissions for the application
RUN chown -R application:application /app/

# Set the working directory
WORKDIR /app

# Expose ports (diese werden dann auf 6060:6443 gemappt)
EXPOSE 80 443

# Start the Apache server
CMD ["supervisord"]