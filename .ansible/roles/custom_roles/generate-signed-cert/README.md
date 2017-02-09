Generate signed cert
--------------------

Purpose: Generate signed certificate from provided root certificate

Usage
-----

    - name: Generate a signed certificate based on a certificate authority
      roles:
        - generate-signed-cert
        
Configuration
-------------

	# Provide root CA location
	# Could be yes/no ; set to no if you already have your certificate authority
	generate_signed_cert_local: "no"
	generate_signed_cert_local_root_cert: "pem/dev/certificate_authority_cert.pem"
	generate_signed_cert_local_root_key: "pem/dev/certificate_authority_key.pem"

	# Provide cert target dir and user 
	generate_signed_cert_user: root
	generate_signed_cert_dir: /etc/cert/

	# Provide cert infos
	generate_signed_cert_email: test@test.com
	generate_signed_cert_organisation: Inovia

	# Define type of certificate
	# Could be ip/domain
	generate_signed_cert_type: "ip"
	generate_signed_cert_ip: 127.0.0.1
	generate_signed_cert_domain: domain.tld


Result
------
    $ ls -lR /etc/cert
    /etc/cert:
    drwxr-xr-x 2 root root 4096 Jul  5 18:50 authority
    drwxr-xr-x 2 root root 4096 Jul  5 18:56 private
    drwxr-xr-x 2 root root 4096 Jul  5 18:50 public
    
    /etc/cert/authority:
    -rw-r--r-- 1 root root 1395 Jul  5 18:45 ca_cert.pem
    -rw-r--r-- 1 root root   17 Jul  5 18:56 ca_cert.srl
    
    /etc/cert/private:
    -rw-r--r-- 1 root root 1679 Jul  5 18:56 key.pem
    
    /etc/cert/public:
    -rw-r--r-- 1 root root 1029 Jul  5 18:56 cert.pem
    -rw-r--r-- 1 root root 1310 Jul  5 18:56 cert_signed.pem


Generate a certificate authority key and certificate
--------------------

    # generate root CA key
    openssl genrsa -out root_ca_key.pem 2048
    
    # generate certificate authority
    openssl req -x509 -new -nodes -key pem/dev/certificate_authority_key.pem \
      -sha512 -days 3650 -out pem/dev/certificate_authority_cert.pem         \
      -subj "/C=FR/ST=Some-State/L=Paris/O=Inovia-Team/CN=Inovia-Team/emailAddress=infra@inovia.fr"
