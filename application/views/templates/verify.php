<div id="verifyPage">
    <form method="post" action="<?= base_url("verify/") ?>">
        <h2>Insert verification code</h2>
        <input placeholder="Input code" id="verificationInput" type="text" name="verificationInput" required><br>

        <button type="submit">Verify</button>
    </form>
</div>