# Development Configuration

There are several additional things that are beneficial when setting up a development or production environment

## Production Environments

### gzip
Enabling `gzip` compression can save a significant amount of bandwidth by compressing file sizes. To enable `gzip` on nginx, update the `/etc/nginx/nginx.conf` file with the following lines:

```
gzip on;
gzip_disable "msie6";

gzip_vary on;
gzip_proxied any;
gzip_comp_level 6;
gzip_buffers 16 8k;
gzip_http_version 1.1;
gzip_min_length 256;
gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript application/vnd.ms-fontobject application/x-font-ttf font/opentype image/svg+xml image/x-icon;
```
