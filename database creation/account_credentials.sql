create TABLE account_credentials
    (
        account INT REFERENCES account_head(account),
        username VARCHAR(15),
        password VARCHAR(255)
    );
