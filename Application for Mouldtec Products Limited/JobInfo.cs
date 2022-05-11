using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class JobInfo
{
    private static string updatedPolyType;
    public static string UpdatedPolyType
    {
        get // This updates the poly type collected from the user, to be shown on the show todays runs page.
        {
            return updatedPolyType;
        }
        set
        {
            updatedPolyType = value;
        }

    }

    private static string updatedJobNum;
    public static string UpdatedJobNum
    {
        get // This updates the job number, to be shown on the show todays runs page.
        {
            return updatedJobNum;
        }
        set
        {
            updatedJobNum = value;
        }
    }
}
