using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public static class SettingsClass
{
    private static string updatedDifficulty;
    public static string UpdatedDifficulty
    {
        get
        {
            return updatedDifficulty;
        }
        set
        {
            updatedDifficulty = value;
        }
    }

    private static float updatedVol;
    public static float UpdatedVol
    {
        get
        {
            return updatedVol;
        }
        set
        {
            updatedVol = value;
        }
    }

    private static int updatedLvlSelection;
    public static int UpdatedLvlSelection
    {
        get
        {
            return updatedLvlSelection;
        }
        set
        {
            updatedLvlSelection = value;
        }
    }
}
