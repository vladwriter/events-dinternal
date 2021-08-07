const App = {
    data() {
      return {
        eventName: [
          ['Event 1', '10:00'],
          ['Event 2', '10:00'],
          ['Event 3', '10:00'],
          ['Event 1', '12:00'],
          ['Event 2', '12:00'],
          ['Event 3', '12:00'],
          ['Event 1', '14:00'],
          ['Event 2', '14:00'],
          ['Event 3', '14:00']
        ],
        events: [],
        toggles: ['toggle-1',
                  'toggle-2',
                  'toggle-3',
                  'toggle-4',
                  'toggle-5',
                  'toggle-6',
                  'toggle-7',
                  'toggle-8',
                  'toggle-9']
      }
    },
    methods: {
      addEvent(event, idx){
        let element = document.getElementById(this.toggles[idx])
        if(this.events.length < 3){
          if(this.events.length === 0){
          this.events.push(event)
          element.classList.toggle("uk-card-primary")
          } else {
          for(let i=0; i<this.events.length; i++){
              if(event[0] !== this.events[i][0] && event[1] !== this.events[i][1]){
                this.events.push(event)
                element.classList.toggle("uk-card-primary")
                break;
              } else if (event[0] === this.events[i][0]){
                alert('Ви вже обрали івент на тему' + event[0])
                break;
              } else {
                alert('Ви вже обрали івент на ' + event[1])
              }
            }
           }
          }  else {
          alert('Ви вже обрали 3 івенти!')
        }     
      },
      deleteEvent(idx){
        this.events.splice(idx, 1)
    },
      totalCounter (){
        let items = this.events.length;
        if(items === 1){
          return 300;
        } else if(items === 2){
          return 500;
        } else if(items === 3){
          return 700;
        } else {
          return 0;
        }
      },
      getEventId(){
        let eventId = [];   
        for(let i=0; i<this.events.length; i++){
          let event = 0;
          let time = 0;
          let construct = '';
          switch (this.events[i][0]){
            case 'Event 1': event = 1
            break;
            case 'Event 2': event = 2
            break;
            case 'Event 3': event = 3
            break;
            default: 0
          }
          console.log(event)
          switch (this.events[i][1]){
            case '10:00': time = 1
            break;
            case '12:00': time = 2
            break;
            case '14:00': time = 3
            break;
            default: 0
          }
          construct = 'w1-t'+time+'-e'+event
          eventId[i] = construct;
        }
        let result = eventId.join(', ')
        return result  
      },
      getEventList(){
        let eventList = [];   
        for(let i=0; i<this.events.length; i++){
          let event = 0;
          let time = 0;
          let construct = '';
          switch (this.events[i][0]){
            case 'Event 1': event = 'Event 1'
            break;
            case 'Event 2': event = 'Event 2'
            break;
            case 'Event 3': event = 'Event 3'
            break;
            default: 0
          }

          switch (this.events[i][1]){
            case '10:00': time = '10:00'
            break;
            case '12:00': time = '12:00'
            break;
            case '14:00': time = '14:00'
            break;
            default: 0
          }
          construct = event+' '+time+' 02.10.2021'
          eventList[i] = construct;
        }
        let result = eventList.join(', ')
        return result
      }

    }
  }
  
  Vue.createApp(App).mount('#app')