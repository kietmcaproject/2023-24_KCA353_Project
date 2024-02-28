using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class OpenURLOnClick : MonoBehaviour
{
    // The URL you want to open
    public Text targetURL,downloadURL;
    
   
    // Function to be called when the button is clicked
    public void OpenWebURL()
    {
        // Open the specified URL in a web browser
        Application.OpenURL(targetURL.text);
    }

    public void OpenDownloadURL()
    {
        Application.OpenURL(downloadURL.text);
    }
}