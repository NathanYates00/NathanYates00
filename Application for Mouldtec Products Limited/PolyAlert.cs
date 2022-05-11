using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class PolyAlert : MonoBehaviour
{
    static private int polyPerRun, machineCap, polyPerClick;
    public Button RunButton;
    public Renderer PopUp;

    private void Start()
    {
        PopUp = gameObject.GetComponent<Renderer>();
    }

    public void PolyPerRunInput(int val)
    {
        // Assigns chosen poly per run to the poly per click,
        // to increment each click
        switch (val)
        {
            case 1:
                polyPerClick = 5;
                break;

            case 2:
                polyPerClick = 10;
                break;

            case 3:
                polyPerClick = 15;
                break;

            case 4:
                polyPerClick = 20;
                break;

            case 5:
                polyPerClick = 25;
                break;
        }
    }

    public void RunButtonPressed()
    {
        // Adds selected poly per run to the current poly count
        polyPerRun += polyPerClick;

        // Machines capacity is 65kg
        machineCap = 65;

        // If the poly used in total exceeds the capacity of the machines, then show poly alert
        if (polyPerRun > machineCap)
        {
            SceneManager.LoadScene(2);
            polyPerRun = 0;
        }
    }
}
