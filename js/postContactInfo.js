const userForm = document.querySelector("form");
const formStatus = document.querySelector("#form-status");

async function postSettings() {
  try {
    const formData = new FormData(userForm);
    formData.append(
      "business_name",
      document.querySelector("#formTitle").innerText
    );

    const response = await fetch("./postUserData.php", {
      method: "POST",
      body: formData,
    });

    if ((await response.text()) === "Success") return true;

    return false;
  } catch (error) {
    console.error("Error posting client info");
    return false;
  }
}

userForm.addEventListener("submit", async (e) => {
  try {
    e.preventDefault();

    if (await postSettings()) {
      formStatus.innerText = "*Successfully submitted!";
      formStatus.style.color = "rgb(16, 150, 24)";
      settingsForm.reset();
    } else {
      formStatus.innerText = "*There is something wrong while submitting";
      formStatus.style.color = "rgb(220, 57, 18)";
    }
  } catch (error) {
    console.error("Error submitting client info");
  }
});
