FROM webdevops/php-apache-dev:8.2

# Update and install necessary packages
RUN apt-get update && apt-get install -y git

# Set the working directory first
WORKDIR /app

# Copy the entire project
COPY . /app/

# Ensure content and assets are properly placed
COPY ./assets /app/assets
COPY ./content /app/content

# Set correct permissions for the application
RUN chown -R application:application /app/ && \
    chmod -R 755 /app/

# Expose ports
EXPOSE 80 443

# Start the supervisor
CMD ["supervisord"]