using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;

public class ChatGPTIntegration : MonoBehaviour
{
    private string apiKey = "your-api-key";
    private string chatGPTUrl = "https://api.openai.com/v1/engines/davinci-codex/completions";

    public void SendUserInput(string userInput)
    {
        StartCoroutine(PostRequest(userInput));
    }

    IEnumerator PostRequest(string userInput)
    {
        string jsonInput = "{\"prompt\": \"" + userInput + "\", \"max_tokens\": 100}";

        using (UnityWebRequest www = UnityWebRequest.PostWwwForm(chatGPTUrl, jsonInput))
        {
            byte[] bodyRaw = System.Text.Encoding.UTF8.GetBytes(jsonInput);
            www.uploadHandler = (UploadHandler)new UploadHandlerRaw(bodyRaw);
            www.downloadHandler = (DownloadHandler)new DownloadHandlerBuffer();
            www.SetRequestHeader("Content-Type", "application/json");
            www.SetRequestHeader("Authorization", "Bearer " + apiKey);
            
            yield return www.SendWebRequest();

            if (www.result == UnityWebRequest.Result.ConnectionError || www.result == UnityWebRequest.Result.ProtocolError)
            {
                Debug.LogError("hello "+www.error);
            }
            else
            {
                string response = www.downloadHandler.text;
                // Process the ChatGPT response here
                Debug.Log("hii"+response);
            }
        }
    }
}
