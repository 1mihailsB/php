//code for dynamic part of the create-product form
$(document).ready(function() {

	let dynamicRules = {
		Book: {
			weight: { 
				info: "Weight with decimals sparated by dot. For example: 150 or 14.01 or 1.99",
				label: "Please provide the weight in <b>kg</b>. For example: 150 or 14.01 or 1.99",
				pattern: "\\d{1,7}\\.\\d{1,2}|\\d{1,7}"
			}
		},

		Dvd: {
			size :{
				info: "Input whole nubmers, max 7 digits long",
				label: "Please provide size of the CD in <b>MB</b>",
				pattern: "\\d{1,7}"
			}
		},

		Furniture: {
			height: {
				info: "Input whole nubmers, max 7 digits long",
				label: "Please provide height in <b>cm</b>",
				pattern: "\\d{1,7}"
			},

			width: {
				info: "Input whole nubmers, max 7 digits long",
				label: "Please provide width in <b>cm</b>",
				pattern: "\\d{1,7}"
			},
			
			length: {
				info: "Input whole nubmers, max 7 digits long",
				label: "Please provide length in <b>cm</b>",
				pattern: "\\d{1,7}"
			}
		}
	};

	let update = function(selected) {
		if (selected === 'Book' || selected === 'Dvd' || selected === 'Furniture') {

			//if product type is changed - remove all dynamic inputs that were present before (see line 55)
			$('div[dynamic="true"]').remove();

			// add input fields dynamically based on selected product type
			for (const [field, properties] of Object.entries(dynamicRules[selected])) {
				console.log('field: ', field, ' properties: ', properties);

				//create form-group (bootstrap class) for each input field
				//and append it to form right away
				let formGroup = $('<div />');
				//mark each dynamic input with 'dynamic' attribute
				formGroup.attr("dynamic", "true")
				formGroup.addClass("form-group");
				formGroup.attr("id", "fgroup-"+field)
				formGroup.appendTo("#dynamic-group");

				//append label to the form-group
				let label = $('<label />');
				label.text(field);
				label.appendTo("#fgroup-"+field);

				//append input field
				let input = $('<input />');
				input.attr("type", "text");
				input.attr("title", properties['info']);
				input.addClass("form-control");
				input.attr("pattern", properties['pattern']);
				input.attr("required", true);
				input.attr("name", "attributes[]");
				input.appendTo("#fgroup-"+field);

				//append discriptive label
				let bottomLabel = $('<label />');
				bottomLabel.html(properties['label']);
				bottomLabel.appendTo("#fgroup-"+field);
				bottomLabel.addClass("text-primary");
				
			}
		}
	}

	let selected = $("#selects").val();
  	update(selected);
	$('#selects').change( function () {
		update($(this).val())
		}
	);
  
});



