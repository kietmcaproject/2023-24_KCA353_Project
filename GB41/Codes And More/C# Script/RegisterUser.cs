using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class RegisterUser : MonoBehaviour
{
    public Text status;
    public InputField regUser, regPass, regEmail;
    string giantString;
    bool takeausername = false;

    public string[] registeredusers;
    public string[] usernames = new string[100];
    public string[] passwords = new string[100];
    public string[] emails = new string[100];

    IEnumerator Start()
    {
        WWW users = new WWW("https://bookreaderxr.000webhostapp.com/read.php");
        yield return users;

        giantString = users.text;

        registeredusers = giantString.Split(";");

        for (int i = 0; i < registeredusers.Length - 1; i++)
        {
            emails[i] = registeredusers[i].Substring(registeredusers[i].IndexOf("Email") + 6);
            emails[i] = emails[i].Remove(emails[i].IndexOf('|'));
        }
    }

    public void trToRegister()
    {
        takeausername = false;
        if (regUser.text == "" || regPass.text == "" || regEmail.text == "")
            status.text = "Can't be empty";
        else
        {
            for (int i = 0; i < registeredusers.Length - 1; i++)
            {
                if (regEmail.text == emails[i])
                {
                    takeausername = true;
                    break;
                }
            }
            if (!takeausername && regUser.text != "Password")
            {
                status.text = "Registered Successfully";
                registerUser(regUser.text, regPass.text, regEmail.text);
            }
            else
            {
                status.text = "Username Already Taken";
            }
        }


    }
    public void registerUser(string username, string password, string email)
    {
        WWWForm form = new WWWForm();

        form.AddField("usernamePost", username);
        form.AddField("passwordPost", password);
        form.AddField("emailPost", email);
        //form.AddField("phonePost", phone);
        
        WWW register = new WWW("https://bookreaderxr.000webhostapp.com/insertUser.php", form);
    }
}

