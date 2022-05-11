using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.IO;
using System.Linq;

public class GetRuns : MonoBehaviour
{
    public Transform contentWindow;
    public GameObject recallRunsObject;

    // Start is called before the first frame update
    void Start()
    {
        string readFromFilePath = Application.persistentDataPath + "/TimeLog.txt";

        List<string> fileLines = File.ReadAllLines(readFromFilePath).ToList();

        foreach (string line in fileLines)
        {
            Instantiate(recallRunsObject, contentWindow);
            recallRunsObject.GetComponent<Text>().text += (line + "\n");
        }
    }

    // Update is called once per frame
    void Update()
    {

    }
}
