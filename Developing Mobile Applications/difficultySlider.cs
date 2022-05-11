using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class difficultySlider : MonoBehaviour
{
    [SerializeField] private Slider slider;
    [SerializeField] private Text sliderText;

    // Start is called before the first frame update
    void Start()
    {
        slider.onValueChanged.AddListener((value) =>
        {
            sliderText.text = value.ToString();
        });
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
