const button = document.getElementById("button");

button.addEventListener("click", function() {
    const output = document.getElementById("input");
    
    function generate(length, includeuppercase, includelowercase, includesymbols, includenumbers) {
        const uppercasechar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const lowercasechar = "abcdefghijklmnopqrstuvwxyz";
        const symbolchar = "!@$£&*(){}`|?/.#";
        const numberschars = "0123456789";

        let allowedchars = "";
        let password = "";

        allowedchars += includelowercase ? lowercasechar : "";
        allowedchars += includeuppercase ? uppercasechar : "";
        allowedchars += includenumbers ? numberschars : "";
        allowedchars += includesymbols ? symbolchar : "";

        if (length <= 0) {
            return "(Password length must be at least 1)";
        }
        if (allowedchars.length === 0) {
            return "(At least 1 set of characters needs to be selected)";
        }

        for (let i = 0; i < length; i++) {
            const randompass = Math.floor(Math.random() * allowedchars.length);
            password += allowedchars[randompass];
        }
        return password;
    }

    const length = 11;
    const includeuppercase = true;
    const includelowercase = true;
    const includesymbols = true;
    const includenumbers = true;

    const password = generate(length, includeuppercase, includelowercase, includesymbols, includenumbers);
    
    output.textContent = `Generated password is:  ${password}`;
});