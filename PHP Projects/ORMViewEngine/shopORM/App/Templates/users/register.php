<h1>REGISTER NEW USER</h1>

<form method="post">
    <div>
        Username: <label>
            <input type="text" required=required name="username" />
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required=required name="password" />
        </label>
    </div>
    <div>
        Confirm Password: <label>
            <input type="text" required=required name="confirm_password" />
        </label>
    </div>
    <div>
        First Name: <label>
            <input type="text" required=required name="firstName" />
        </label>
    </div>
    <div>
        Last Name: <label>
            <input type="text" name="lastName" />
        </label>
    </div>
    <div>
        Birthday: <label>
            <input type="text" name="bornOn" />
        </label>
    </div>
    <div>
        <input type="submit" value="Register!" name="register" />
    </div>
</form>